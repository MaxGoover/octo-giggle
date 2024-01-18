import helpersDateTime from '@/utils/helpers/dateTime'

class TimerCountdown {
  // duration
  // interval
  // minutes
  // remaining
  // seconds

  constructor(duration) {
    this.duration = duration
    this.remaining = 0
  }
  clear() {
    clearInterval(this.interval)
  }
  isTimeUp() {
    return this.remaining === 0
  }
  reset() {
    const time = helpersDateTime.formatTimeToMinutesSeconds(this.duration)
    this.remaining = this.duration
    this.minutes = time.split(':')[0]
    this.seconds = time.split(':')[1]
  }
  start() {
    if (this.isTimeUp()) {
      this.reset()
      this.interval = setInterval(() => {
        this.tick()
      }, 1000)
    }
  }
  tick() {
    this.remaining--
    this.update()
  }
  update() {
    this.updateMinutes()
    this.updateSeconds()
  }
  updateMinutes() {
    this.minutes = parseInt(this.remaining / 60, 10)
  }
  updateSeconds() {
    this.seconds = parseInt(this.remaining % 60, 10)
    this.seconds = this.seconds < 10 ? '0' + this.seconds : this.seconds
  }
}

export { TimerCountdown }
