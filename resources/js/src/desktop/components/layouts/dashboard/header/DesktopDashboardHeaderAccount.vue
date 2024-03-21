<template>
  <div class="account" :title="$t('topToolBar.profile')">
    <q-item class="q-px-sm rounded-borders" clickable v-ripple>
      <q-item-section>
        <q-item-label>
          <span class="account__text account__text--primary">{{
            $page.props.currentUser.name
          }}</span>
        </q-item-label>
        <q-item-label>
          <span class="account__text account__text--secondary">
            {{ $page.props.currentUser.phoneFormatted }}
          </span>
        </q-item-label>
      </q-item-section>
      <q-item-section side>
        <q-avatar class="avatar">{{ $page.props.currentUser.nameInitials }}</q-avatar>
      </q-item-section>
    </q-item>

    <q-menu anchor="top end" auto-close self="top right" :offset="[0, -8]">
      <q-list>
        <!--Аватар-->
        <div class="column items-center">
          <q-avatar class="q-mt-lg avatar">{{ $page.props.currentUser.nameInitials }}</q-avatar>
          <q-item class="q-mt-sm q-pa-none">
            <q-item-section>
              <q-item-label class="text-center">
                <span class="account__text account__text--primary">{{
                  $page.props.currentUser.name
                }}</span>
              </q-item-label>
              <q-item-label class="text-center">
                <span class="account__text account__text--secondary">
                  {{ $page.props.currentUser.phoneFormatted }}
                </span>
              </q-item-label>
            </q-item-section>
          </q-item>
        </div>

        <!--Личный кабинет-->
        <!-- <q-item class="q-mt-sm q-px-lg" clickable :to="{ name: 'Account' }"> -->
        <q-item class="q-mt-sm q-px-lg" clickable>
          <q-item-section avatar>
            <q-icon color="dark" name="mdi-account-circle-outline" size="22px" />
          </q-item-section>
          <q-item-section>
            <span>{{ $t('account.menu.personalAccount') }}</span>
          </q-item-section>
        </q-item>

        <q-separator class="q-mx-lg" />

        <!--Список организаций-->
        <q-list> </q-list>

        <!--Добавить организацию-->
        <q-item class="q-px-lg" clickable>
          <q-item-section avatar>
            <q-icon color="indigo-12" name="mdi-plus" size="22px" />
          </q-item-section>
          <q-item-section>
            <span class="text-indigo-12">{{ $t('account.menu.addOrganization') }}</span>
          </q-item-section>
        </q-item>

        <q-separator class="q-mx-lg" />

        <!--Выход-->
        <q-item class="q-px-lg" clickable @click="authStore.signOut">
          <q-item-section avatar>
            <q-icon color="dark" name="mdi-logout" size="22px" />
          </q-item-section>
          <q-item-section>
            <span>{{ $t('account.menu.logOut') }}</span>
          </q-item-section>
        </q-item>
      </q-list>
    </q-menu>
  </div>
</template>

<script setup>
import { useAuthStore } from '@/stores/auth'

const authStore = useAuthStore()
</script>

<style lang="sass" scoped>
.account
  &__text
    display: block
    float: right
    max-width: 220px
    overflow: hidden !important
    text-overflow: ellipsis !important
    white-space: nowrap !important

    &--primary
      font-weight: 600

    &--secondary
      color: $grey-6
      font-size: 12px
.avatar
  background-color: $blue-grey-2
  color: $dark
  font-size: 28px
  font-weight: 600
  height: 48px
  width: 48px
</style>
