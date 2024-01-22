import { computed, ref, onMounted, watch } from 'vue'
import helpersDateTime from '@/utils/helpers/dateTime'

/**
 * Таймер обратного отсчёта.
 * @param {int} durationValue - Длительность таймера в секундах
 * @returns {Object}
 */
export default function useTimerCountdown(durationValue) {
  const duration = ref(durationValue) // длительность таймера
  const interval = ref(0) // интервал таймера
  const minutes = ref(0) // минуты таймера
  const remaining = ref(0) // время до окончания таймера (в секундах)
  const seconds = ref(0) // секунды таймера

  /**
   * Определяет, закончился ли счетчик времени у таймера
   * @returns {Boolean}
   */
  const isTimeUp = computed(() => {
    return remaining.value === 0
  })

  /**
   * Убавляет таймер на одну секунду
   * @returns {void}
   */
  const secondUp = () => {
    remaining.value--
  }

  /**
   * Сбрасывает счетчик времени у таймера
   * @returns {void}
   */
  const reset = () => {
    const time = helpersDateTime.formatTimeToMinutesSeconds(duration.value)
    remaining.value = duration.value
    minutes.value = time.split(':')[0]
    seconds.value = time.split(':')[1]
  }

  /**
   * Запускает счетчик времени у таймера
   * @returns {void}
   */
  const start = () => {
    interval.value = setInterval(() => {
      tick()
    }, 1000)
  }

  /**
   * Останавливает счётчик времени у таймера
   * @returns {void}
   */
  const stop = () => {
    clearInterval(interval.value)
  }

  /**
   * Один тик таймера
   * @returns {void}
   */
  const tick = () => {
    secondUp()
    updateMinutes()
    updateSeconds()
  }

  /**
   * Обновляет минуты таймера
   * @returns {void}
   */
  const updateMinutes = () => {
    minutes.value = parseInt(remaining.value / 60, 10)
  }

  /**
   * Обновляет секунды таймера
   * @returns {void}
   */
  const updateSeconds = () => {
    seconds.value = parseInt(remaining.value % 60, 10)
    seconds.value = seconds.value < 10 ? '0' + seconds.value : seconds.value
  }

  /**
   * Останавливает таймер по окончании времени
   * @returns {void}
   */
  watch(isTimeUp, (newValue) => {
    if (newValue) {
      stop()
    }
  })

  onMounted(() => {
    reset()
    start()
  })

  return {
    isTimeUp,
    minutes,
    reset,
    seconds,
    start,
  }
}
