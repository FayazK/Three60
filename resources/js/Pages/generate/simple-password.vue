<template layout="app">

  <app-layout>
    <template v-slot:heading>
      Simple Password Generator
    </template>
    <template v-slot:action-buttons>
      <n-button>Refresh</n-button>
    </template>
    <n-input size="large" type="text" readonly placeholder="Your Generated Password"
             v-model:value="generatedPassword"></n-input>
    <n-space justify="center">
      <n-button type="primary" size="large" class="text-green-500" @click="generatePassword()">Generate</n-button>
      <n-button size="large">Copy</n-button>
    </n-space>
  </app-layout>
</template>

<script>
import { NInput, NSlider, NSpace, NButton } from 'naive-ui'
import generatePassword from 'omgopass'
import AppLayout from '@/Layouts/AppLayout'
import { defineComponent } from 'vue'

export default defineComponent({
  components: { NInput, NSlider, NSpace, NButton, AppLayout },
  data () {
    return {
      generatedPassword: '',
      length: '3',
    }
  },

  methods: {
    generatePassword () {
      this.generatedPassword = generatePassword({
      })
      console.log(this.generatedPassword)
    },
    formatTooltip: (value) => `${value}%`,

  }

})
</script>

<style scoped>

</style>
