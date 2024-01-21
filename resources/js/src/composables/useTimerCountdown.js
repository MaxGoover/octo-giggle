import { computed, ref, onMounted, watch } from 'vue'
import helpersDateTime from '@/utils/helpers/dateTime'

/**
 * Таймер обратного отсчёта.
 * @param {int} dur
 * @returns
 */
export default function useTimerCountdown(dur) {
  let duration = ref(0)
  let interval = ref(0)
  let minutes = ref(0)
  let remaining = ref(0)
  let seconds = ref(0)

  duration = dur

  // computed
  const isTimeUp = computed(() => remaining === 0)

  // watch
//   watch(isTimeUp, (newValue) => {
//     if (newValue) {
//       clear()
//     }
//   })

  // methods
  const clear = () => clearInterval(interval)
  const reset = () => {
    const time = helpersDateTime.formatTimeToMinutesSeconds(duration)
    remaining = duration
    minutes = time.split(':')[0]
    seconds = time.split(':')[1]
  }
  const start = () => {
    if (isTimeUp) {
      reset()
      interval = setInterval(() => {
        tick()
      }, 1000)
    }
  }
  const tick = () => {
    remaining--
    update()
  }
  const update = () => {
    updateMinutes()
    updateSeconds()
  }
  const updateMinutes = () => {
    minutes = parseInt(remaining / 60, 10)
  }
  const updateSeconds = () => {
    seconds = parseInt(remaining % 60, 10)
    seconds = seconds < 10 ? '0' + seconds : seconds
  }

  // hooks
  onMounted(start)

  return {
    clear,
    isTimeUp,
    minutes,
    reset,
    seconds,
    start,
  }
}
