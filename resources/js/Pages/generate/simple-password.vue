<template>
  <app-layout>
    <template v-slot:heading>
      Simple Password Generator
    </template>
    <template v-slot:action-buttons>
      <n-button>Refresh</n-button>
    </template>
    <n-input size="large" type="text" readonly placeholder="Your Generated Password"
             v-model:value="generatedPassword"></n-input>
    <n-space justify="center" class="pt-4">
      <n-button type="primary" size="large" class="text-green-500" @click="createPassword()">Generate</n-button>
      <n-button size="large" @click="copyPassword()">Copy</n-button>
    </n-space>
  </app-layout>
</template>

<script setup>
import { NInput, NSlider, NSpace, NButton, NMessageProvider } from 'naive-ui'
import { useMessage } from 'naive-ui'
import generatePassword from 'omgopass'
import AppLayout from '@/Layouts/AppLayout'
import { ref } from 'vue'
import copy from 'copy-to-clipboard'

let generatedPassword = ref('')
const length = ref(3)

function createPassword () {
  generatedPassword.value = generatePassword({})
}

function formatTooltip (value) { `${value}%`}

/**
 *
 */
function copyPassword () {
  copy(generatedPassword.value)
  //useMessage().info('Password Copied to Clipboard')
}
</script>

<style scoped>

</style>
