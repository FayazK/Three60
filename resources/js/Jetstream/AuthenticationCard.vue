<template>
  <n-layout class="mt-[8rem]">
    <n-layout-content>
      <n-grid cols="3">
        <n-grid-item offset="1">
          <n-space justify="center">
            <slot name="logo"/>
          </n-space>
        </n-grid-item>
      </n-grid>
      <n-grid cols="3" class="mt-[2rem]">
        <n-grid-item offset="1">
          <slot/>
        </n-grid-item>
      </n-grid>
    </n-layout-content>
    <n-layout-footer class="bg-transparent text-center mt-6 text-sm text-gray-400">
      Coded with 💕 by <a target="_blank" href="https://fayazk.com">Fayaz K</a>
    </n-layout-footer>
  </n-layout>
</template>

<script>
import { NGrid, NGridItem, NSpace, NLayout, NLayoutContent, NLayoutFooter } from 'naive-ui'
import { defineComponent } from 'vue'

export default defineComponent({
  components: {
    NGrid, NGridItem, NSpace, NLayout, NLayoutContent, NLayoutFooter
  }
})
</script>
