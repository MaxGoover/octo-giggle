<template>
  <q-btn
    flat
    round
    icon="mdi-bell-outline"
    :title="$t('topToolBar.notifications')"
    @click="dashboardStore.getNotifications"
  >
    <q-badge v-if="$page.props.countUnreadNotifications" color="red" floating rounded>{{
      $page.props.countUnreadNotifications
    }}</q-badge>

    <q-menu anchor="top end" auto-close self="top right" :offset="[0, -8]">
      <!--Лоадер-->
      <!-- <q-list v-if="true">
        <q-item clickable>
          <q-item-section avatar>
            <q-inner-loading showing />
          </q-item-section>
        </q-item>
      </q-list> -->

      <!--Список уведомлений-->
      <!-- <q-list v-else> -->
      <q-list>
        <q-item class="q-px-lg" clickable>
          <q-item-section avatar>
            <q-icon color="indigo-12" name="mdi-plus" size="22px" />
          </q-item-section>
          <q-item-section>
            <span class="text-indigo-12">{{ $t('account.menu.addOrganization') }}</span>
          </q-item-section>
        </q-item>
      </q-list>
    </q-menu>
  </q-btn>
</template>

<script setup>
import { inject } from 'vue'
import { useDashboardStore } from '@/stores/dashboard'
import { usePage } from '@inertiajs/vue3'
import notify from '@/utils/helpers/notify'

const dashboardStore = useDashboardStore()
const page = usePage()

const NOTIFICATION_TYPES = inject('NOTIFICATION_TYPES')

const isNotificationTypeUploadFileProducts = (notificationType) =>
  notificationType === NOTIFICATION_TYPES.UPLOAD_FILE_PRODUCTS

// увеличивает счетчик уведомлений
window.Echo.private(`App.Entities.User.User.${page.props.currentUser.id}`).notification(
  (notification) => {
    if (isNotificationTypeUploadFileProducts(notification.type)) {
      page.props.countUnreadNotifications++
      notify.success(notification.text)
    }
  },
)
</script>
