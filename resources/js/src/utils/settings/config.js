// Настройки приложения
export default {
  animation: {
    appear: 'fadeIn',
    disappear: 'fadeOut',
  },
  auth: {
    link: {
      privacyPolicy: 'https://legal.handswork.pro/privacy-policy',
      userAgreement: 'https://legal.handswork.pro/user-agreement',
    },
    timer: {
      duration: 3, // (сек) до возможности получения нового СМС-кода для авторизации
    },
  },
  debounce: {
    disappear: 300, // (мс) задержка в миллисекундах перед удалением модели (например удаление транзакции из реестра)
    search: 300, // (мс) задержка в миллисекундах перед отправкой запроса-поиска
  },
}