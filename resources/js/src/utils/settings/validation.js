// Настройки валидации приложения
export default {
  bankCard: {
    mask: '#### #### #### ####',
    minLength: 19,
  },
  date: {
    format: 'DD.MM.YYYY',
    mask: '##.##.####',
  },
  email: {
    maxLength: 254,
    code: {
        mask: '######',
        minLength: 6,
    },
  },
  inn: {
    minLength: 10,
    maxLength: 12,
  },
  passport: {
    departmentCode: {
      mask: '###-###',
      minLength: 7,
    },
    number: {
      mask: '######',
      minLength: 6,
    },
    series: {
      mask: '####',
      minLength: 4,
    },
  },
  phone: {
    formatted: {
      mask: '+7 (###) ###-##-##',
      minLength: 18,
    },
    length: 10,
  },
  time: {
    format: 'HH:mm',
  },
}
