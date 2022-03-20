<template layout="app">

  <n-input size="large" type="text" readonly placeholder="Your Generated Password" v-model="props.password"></n-input>
  <n-slider min="3" max="32" show-tooltip :format-tooltip="(number)=>'Length: '+number" class="mt-14"
            v-model="props.length"/>
  <n-space justify="center">
    <n-button type="primary" size="large" class="text-green-500" @click="generatePassword()">Generate</n-button>
    <n-button size="large">Copy</n-button>
  </n-space>
</template>

<script setup>
import { reactive } from 'vue'
import { NInput, NSlider, NSpace, NButton } from 'naive-ui'
import password from 'password'

export default {
  components: { NInput, NSlider, NSpace, NButton },
  props: {
    generatedPassword:'',
    length:3,
  }
}



function generatePassword () {
  props.password = password(props.length)
}


</script>

<style scoped>

</style>
