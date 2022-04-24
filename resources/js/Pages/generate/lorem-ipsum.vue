<template>
  <app-layout>
    <template v-slot:heading>
      Lorem Ipsum Generator
    </template>
    <template v-slot:action-buttons>
      <n-button>Refresh</n-button>
    </template>
    <n-grid x-gap="12" :cols="5">
      <n-grid-item :offset="1" :span="3">
        <n-input type="textarea" readonly placeholder="Lorem Ipsum"
                 v-model:value="generatedText" :rows="10"></n-input>
        <n-slider v-model:value="length" :min="1" :max="64" class="mt-14" :show-tooltip="true" :format-tooltip="formatTooltip" />
        <n-space class="pt-4" align="center" vertical>
          <n-switch v-model:value="textFormat" size="large" class="self-center">
            <template #checked>
              HTML
            </template>
            <template #unchecked>
              PLAIN
            </template>
          </n-switch>
        </n-space>
        <n-space justify="center" class="pt-4">
          <n-button type="primary" size="large" @click="createPassword()">Generate</n-button>
          <n-button size="large" @click="copyPassword()">Copy</n-button>
        </n-space>
      </n-grid-item>
    </n-grid>
  </app-layout>
</template>

<script setup>
import { NInput, NSlider, NSpace, NButton, NGrid, NGridItem, NSwitch } from 'naive-ui'
import { createToaster } from '@meforma/vue-toaster'
import generatePassword from 'omgopass'
import AppLayout from '@/Layouts/AppLayout'
import { ref } from 'vue'
import copy from 'copy-to-clipboard'
import { LoremIpsum } from 'lorem-ipsum'

const toaster = createToaster({
  position: 'top-right'
})

let generatedText = ref('')
const length = ref(3)
const textFormat = ref(false)

function createPassword () {
  const lorem = new LoremIpsum({}, textFormat.value?'html':'plain')
  generatedText.value = lorem.generateParagraphs(length.value)
}

function formatTooltip (value) { return `Length: ${value}`}

/**
 *
 */
function copyPassword () {
  copy(generatedText.value)
  toaster.show('Copied')
  //useMessage().info('Password Copied to Clipboard')
}
</script>

<style scoped>
.cutom-text {
  font-size: 32px;
}
</style>
