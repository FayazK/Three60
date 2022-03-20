<template>
  <Head title="Log in"/>


  <jet-authentication-card>
    <template #logo>
      <jet-authentication-card-logo/>
    </template>


    <n-card>
      <jet-validation-errors class="mb-4"/>
      <n-alert v-if="status" :show-icon="false">
        {{ status }}
      </n-alert>
      <n-form @submit.prevent="submit">
        <n-form-item path="email" label="Email">
          <n-input v-model:value="form.email" @keydown.enter.prevent/>
        </n-form-item>
        <n-form-item path="password" label="Password">
          <n-input
              v-model:value="form.password"
              type="password"
              @keydown.enter.prevent
          />
        </n-form-item>
        <n-checkbox v-model:checked="form.remember">
          Remember me
        </n-checkbox>
        <n-space justify="end" align="center">
          <a v-if="canResetPassword" :href="route('password.request')">
            Forgot your password?
          </a>
          <n-button attr-type="submit">Log in</n-button>
        </n-space>
      </n-form>
    </n-card>

  </jet-authentication-card>
</template>

<script>
import { defineComponent } from 'vue'
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'
import {
  NButton,
  NSpace,
  NCard,
  NForm,
  NFormItem,
  NInput,
  NCheckbox,
  NAlert,
} from 'naive-ui'

export default defineComponent({
  components: {
    Head,
    JetAuthenticationCard,
    JetAuthenticationCardLogo,
    JetValidationErrors,
    Link,
    NButton,
    NSpace,
    NCard,
    NForm,
    NFormItem,
    NInput,
    NCheckbox,
    NAlert
  },

  props: {
    canResetPassword: Boolean,
    status: String
  },

  data () {
    return {
      form: this.$inertia.form({
        email: '',
        password: '',
        remember: false
      })
    }
  },

  methods: {
    submit () {
      this.form
          .transform(data => ({
            ...data,
            remember: this.form.remember ? 'on' : ''
          }))
          .post(this.route('login'), {
            onFinish: () => this.form.reset('password'),
          })
    }
  }
})
</script>
