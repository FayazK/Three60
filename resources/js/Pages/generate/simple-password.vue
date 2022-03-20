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
        <n-button type="primary" size="large" class="text-green-500" @click="generatePassword()">Generate</n-button>
        <n-button size="large" @click="copyPassword()">Copy</n-button>
      </n-space>
    </app-layout>
</template>

<script>
import { NInput, NSlider, NSpace, NButton, NMessageProvider } from 'naive-ui'
import { useMessage } from 'naive-ui'
import generatePassword from 'omgopass'
import AppLayout from '@/Layouts/AppLayout'
import { defineComponent } from 'vue'
import copy from 'copy-to-clipboard'

const message = useMessage()
export default defineComponent({
  components: { NInput, NSlider, NSpace, NButton, AppLayout,NMessageProvider },
  data () {
    return {
      generatedPassword: '',
      length: '3',
    }
  },

  methods: {
    generatePassword () {
      this.generatedPassword = generatePassword({})
    },
    formatTooltip: (value) => `${value}%`,

    /**
     *
     */
    copyPassword () {
      copy(this.generatedPassword)
      useMessage().info('Password Copied to Clipboard')
    }

  },

  mounted () {
    window.$message = useMessage()
  }

})
</script>

<style scoped>

</style>
