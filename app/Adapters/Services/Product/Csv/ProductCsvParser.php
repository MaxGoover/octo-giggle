<?php

declare(strict_types=1);

namespace App\Adapters\Services\Product\Csv;

class ProductCsvParser
{
    private string $filePath;
    private array $products = [];
    private array $productsValidated = [];

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function examine(): self
    {
        foreach ($this->products as $product) {
            if ($this->validate($product)) {
                $this->productsValidated[] = $this->getValidated($product);
            }
        }

        return $this;
    }

    public function getWorkersCanBeLoaded(): array
    {
        return $this->canBeLoaded;
    }

    public function getWorkersCanNotBeLoaded(): array
    {
        return $this->canNotBeLoaded;
    }

    public function extract(): self
    {
        $fullPath = Storage::disk('local')->path($this->filePath);
        $workers = Excel::toArray(new WorkersImport, $fullPath, null, 'Xlsx');
        Storage::disk('local')->delete($this->filePath);
        $workers = $workers[0];
        array_shift($workers);

        foreach ($workers as $worker) {
            if ($worker[6] === 'Москва') {
                $worker[6] = 'Москва и Московская область';
            }

            if (!blank($worker[7]) && !is_string($worker[7])) {
                $worker[7] = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($worker[7])->format('d.m.Y');
            }

            if (!blank($worker[10]) && !is_string($worker[10])) {
                $worker[10] = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($worker[10])->format('d.m.Y');
            }

            $field = [
                'phone' => $worker[0],
                'profile' => [
                    'inn' => $worker[1],
                    'last_name' =>  $worker[2],
                    'first_name' =>  $worker[3],
                    'middle_name' =>  $worker[4],
                    'sex_id' => $worker[5] ? ($worker[5] == 'Женщина' ? 2 : 1) : null,
                    'city_id' => $worker[6] ? optional(City::where('name', $worker[6])->first())->id : null,
                    'birthday' => $worker[7],
                    'citizenship_id' => $worker[8] ? optional(Citizenship::where('name', $worker[8])->first())->id : null
                ],
                'passportData' => [
                    'authority' => $worker[9],
                    'date' => $worker[10],
                    'number' => $worker[11],
                    'series' => $worker[12],
                ],
                'bankCard' => $worker[13],
                'isExist' => false,
            ];

            $field['profile'] = array_merge($field['profile'], $this->getSource($worker['14']));

            if (!blank($field['phone'])) {
                $field['isExist'] = !!Worker::where('phone', $field['phone'])->count();
            }

            if (!($field['profile']['inn'] ?? false)) {
                $field['profile']['inn'] = $this->sendInnRequest($field);
            }

            $this->workers[] = $field;
        }

        return $this;
    }

    private function sendInnRequest($field)
    {
        $innService = new InnService;

        return $innService->requestInn([
            'last_name' => $field['profile']['last_name'],
            'first_name' => $field['profile']['first_name'],
            'middle_name' => $field['profile']['middle_name'],
            'birthday' => $field['profile']['birthday'] ?: null,
            'passportNumber' =>  $field['passportData']['number'],
            'passportSeries' => $field['passportData']['series'],
            'passportDate' => $field['passportData']['date'],
        ]);
    }

    private function getSource($text)
    {
        if (blank($text)) {
            return [
                'source_id' => null,
                'custom_source' => null
            ];
        }

        $text = trim($text);
        $source = Source::where('name', $text)->first();
        if (blank($source)) {
            return [
                'source_id' => Source::where('name', 'Другое')->first()->id,
                'custom_source' => $text
            ];
        }

        return [
            'source_id' => $source->id,
            'custom_source' => null
        ];
    }

    private function validate($worker)
    {
        $validator = Validator::make($worker, [
            'phone' => [
                'required',
                'numeric',
                'digits_between:10,10',
            ],
            'profile.last_name' => 'required',
            'profile.first_name' => 'required',
            'profile.sex_id' => 'required',
            'profile.citizenship_id' => 'required',
            'profile.city_id' => 'required',
            'profile.birthday' => 'filled|date_format:d.m.Y',
        ]);

        return !$validator->fails();
    }

    private function getValidated($worker)
    {
        $validator = Validator::make($worker, [
            'phone' => [
                'required',
                'numeric',
                'digits_between:10,10'
            ],
            'profile.inn' => [
                'nullable',
                Rule::unique('worker_profiles', 'inn')->ignore(optional(Worker::where('phone', $worker['phone'])->first())->id, 'user_id'),
                new ValidInnRule
            ],
            'bankCard' => [
                'nullable',
                'numeric',
                new ValidCardNumberRule,
            ],
            'profile.first_name' => 'required',
            'profile.last_name' => 'required',
            'profile.middle_name' => 'nullable',
            'profile.sex_id' => 'required',
            'profile.city_id' => 'required|numeric',
            'profile.birthday' => 'filled|date_format:d.m.Y',
            'profile.referrer_id' => 'nullable|numeric',
            'profile.citizenship_id' => 'nullable|numeric',
            'profile.education_id' => 'nullable|numeric',
            'profile.target' => 'nullable|string',
            'profile.is_payable_tax' => 'nullable|boolean',
            'professions' => 'nullable|array',
            'professions.*' => 'nullable|exists:professions,id',
            'media' => 'nullable|array',
            'media.*' => 'nullable|file|mimetypes:image/jpeg,image/png,image/pjpeg,application/pdf',
            'passportData' => 'nullable|array',
            'passportData.authority' => 'nullable|string',
            'passportData.date' => 'nullable|date_format:"d.m.Y"|before_or_equal:' . now()->format('d.m.Y'),
            'passportData.number' => 'nullable',
            'passportData.series' => 'nullable',
        ], [
            'profile.inn.*' => 'Не правильный инн.',
            'profile.first_name.*' => 'Ошибка в имени.',
            'profile.last_name.*' => 'Ошибка в фамилии.',
            'profile.sex_id.*' => 'Не указан пол.',
            'profile.birthday.*' => 'Не правильная дата рождения.',
            'passportData.authority.*' => 'Ошибка в паспортных данных.',
            'passportData.date.*' => 'Ошибка в дате выдачи паспорта.',
            'passportData.number.*' => 'Ошибка в номере паспорта.',
            'passportData.series.*' => 'Ошибка в серии паспорта.',
            'bankCard.*' => 'Не правильный номер карты.'
        ]);

        if ($validator->fails()) {
            foreach ($validator->failed() as $name => $val) {
                $errorPath = explode('.', $name);

                if (sizeof($errorPath) > 1) {
                    $worker[$errorPath[0]][$errorPath[1]] = null;
                } else {
                    $worker[$name] = null;
                }
            }
        }

        foreach ($validator->errors()->messages() as $name => $messages) {
            $worker['error_messages'][$name] = join(',', $messages);
        }

        return $worker;
    }
}
