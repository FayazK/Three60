<template>
  <app-layout>
    <template v-slot:heading>
      Simple Password Generator
    </template>
    <template v-slot:action-buttons>
      <n-button>Refresh</n-button>
    </template>
    <n-grid x-gap="12" :cols="3">
      <n-grid-item :offset="1">
        <n-input size="large" type="text" readonly placeholder="Your Generated Password"
                 v-model:value="generatedPassword" :show-count="true" class="text-center text-xl"></n-input>
        <n-space justify="center" class="pt-4">
          <n-switch v-model:value="includeNumber" size="large" class="self-center">
            <template #checked>
              Numbers ON
            </template>
            <template #unchecked>
              Numbers OFF
            </template>
          </n-switch>
        </n-space>
        <n-space justify="center" class="pt-4">
          <n-button type="primary" size="large" class="text-green-600" @click="createPassword()">Generate</n-button>
          <n-button size="large" @click="copyPassword()">Copy</n-button>
        </n-space>
      </n-grid-item>
    </n-grid>
  </app-layout>
</template>

<script setup>
import { NInput, NSpace, NButton,NGrid,NGridItem,NSwitch} from 'naive-ui'
import { createToaster } from "@meforma/vue-toaster";
import generatePassword from 'omgopass'
import AppLayout from '@/Layouts/AppLayout'
import { ref } from 'vue'
import copy from 'copy-to-clipboard'

const toaster = createToaster({
  position:'top-right'
});

let generatedPassword = ref('')
const length = ref(3)
const includeNumber = ref(false)

function createPassword () {
  generatedPassword.value = generatePassword({
    hasNumbers:includeNumber.value,
  })
}

function formatTooltip (value) { `${value}%`}

/**
 *
 */
function copyPassword () {
  copy(generatedPassword.value)
  toaster.info('Copied');
  //useMessage().info('Password Copied to Clipboard')
}
</script>

<style scoped>

</style>
