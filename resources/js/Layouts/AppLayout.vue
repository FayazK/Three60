<template>
  <n-layout class="h-screen relative">
    <n-layout-header class="h-[38px] flex" :inverted="inverted" bordered>
      <n-switch v-model:value="inverted" size="small" class="self-center">
        <template #checked-icon>
          <n-icon :component="Moon"/>
        </template>
        <template #unchecked-icon>
          <n-icon :component="Sunny"/>
        </template>
      </n-switch>
    </n-layout-header>
    <n-layout position="absolute" style="top: 38px; bottom: 37px" has-sider>
      <n-layout-sider
          bordered
          show-trigger
          collapse-mode="width"
          :collapsed-width="64"
          :width="240"
          :inverted="inverted"
          :native-scrollbar="false"
      >
        <n-menu
            :inverted="inverted"
            :collapsed-width="64"
            :collapsed-icon-size="22"
            :options="menuOptions"
            :indent="12"
        />
      </n-layout-sider>
      <n-layout content-style="padding:12px" :native-scrollbar="false">
        <n-page-header>
          <template #title>
            <slot name="heading"></slot>
          </template>
          <template #extra>
            <n-space>
              <slot name="action-buttons"></slot>
            </n-space>
          </template>
        </n-page-header>
        <n-layout class="mt-4">
          <slot></slot>
        </n-layout>
      </n-layout>
    </n-layout>
    <n-layout-footer
        position="absolute"
        class="p-2 text-right text-gray-400 text-sm"
        bordered
        :inverted="inverted"
    >
      Coded with ❤ by <a href="https://fayazk.com" target="_blank">Fayaz K</a>
    </n-layout-footer>
  </n-layout>
</template>

<script setup>
import {
  NLayout,
  NPageHeader,
  NLayoutHeader,
  NLayoutSider,
  NLayoutFooter,
  NMenu,
  NIcon,
  NSwitch
} from 'naive-ui'
import { h, ref } from 'vue'
import { Link } from '@inertiajs/inertia-vue3'

import {
  BookOutline as BookIcon,
  PersonOutline as PersonIcon,
  WineOutline as WineIcon,
  Sunny,
  Moon
} from '@vicons/ionicons5'

function renderIcon (icon) {
  return () => h(NIcon, null, { default: () => h(icon) })
}

const inverted = ref(false)

const menuOptions = [
  {
    label: 'Hear the Wind Sing',
    key: 'hear-the-wind-sing',
    icon: renderIcon(BookIcon)
  },
  {
    label: 'Generators',
    key: 'generators',
    icon: renderIcon(BookIcon),
    children: [
      {
        label: () => h(Link,
            {
              href: route('generate.lorem-ipsum')
            },
            {
              default: () => 'Lorem Ipsum Generator'
            }),
        key: 'lorem-ipsum',
      }
    ]
  },
  {
    label: 'A Wild Sheep Chase',
    key: 'a-wild-sheep-chase',
    disabled: true,
    icon: renderIcon(BookIcon)
  },
  {
    label: 'Generators2',
    key: 'generators2',
    icon: renderIcon(BookIcon),
    children: [
      {
        type: 'group',
        label: 'People',
        key: 'people',
        children: [
          {
            label: 'Narrator',
            key: 'narrator',
            icon: renderIcon(PersonIcon)
          },
          {
            label: 'Sheep Man',
            key: 'sheep-man',
            icon: renderIcon(PersonIcon)
          }
        ]
      },
      {
        label: 'Beverage',
        key: 'beverage',
        icon: renderIcon(WineIcon),
        children: [
          {
            label: 'Whisky',
            key: 'whisky'
          }
        ]
      },
      {
        label: 'Food',
        key: 'food',
        children: [
          {
            label: 'Sandwich',
            key: 'sandwich'
          }
        ]
      },
      {
        label: 'The past increases. The future recedes.',
        key: 'the-past-increases-the-future-recedes'
      }
    ]
  }
]
</script>
