<template>
  <main class="main">
    <div class="container">
      <div class="auth-wrapper">
        <div class="auth-tabs">
          <span
            class="auth-tab"
            :class="{ active: activeTab === 'login' }"
            @click="activeTab = 'login'"
          >Вход</span>
          <span
            class="auth-tab"
            :class="{ active: activeTab === 'register' }"
            @click="activeTab = 'register'"
          >Регистрация</span>
        </div>

        <!-- Форма входа -->
        <form v-if="activeTab === 'login'" class="auth-form" @submit.prevent="onLogin">
          <h2 class="auth-form__title">Вход в аккаунт</h2>
          <div class="form-group">
            <label for="login-email">Email</label>
            <input type="email" id="login-email" v-model="loginForm.email" placeholder="example@mail.ru" required>
          </div>
          <div class="form-group">
            <label for="login-password">Пароль</label>
            <input type="password" id="login-password" v-model="loginForm.password" placeholder="••••••••" required>
          </div>
          <button type="submit" class="btn btn-primary">Войти</button>
          <p class="auth-form__hint">Ещё нет аккаунта? <a href="#" @click.prevent="activeTab = 'register'" class="auth-form__switch">Зарегистрируйтесь</a></p>
        </form>

        <!-- Форма регистрации -->
        <form v-else class="auth-form" @submit.prevent="onRegister">
          <h2 class="auth-form__title">Регистрация</h2>
          <div class="form-group">
            <label for="reg-name">Имя</label>
            <input type="text" id="reg-name" v-model="registerForm.name" placeholder="Иван Иванов" required>
          </div>
          <div class="form-group">
            <label for="reg-email">Email</label>
            <input type="email" id="reg-email" v-model="registerForm.email" placeholder="example@mail.ru" required>
          </div>
          <div class="form-group">
            <label for="reg-password">Пароль</label>
            <input type="password" id="reg-password" v-model="registerForm.password" placeholder="••••••••" required>
          </div>
          <div class="form-group">
            <label for="reg-password-confirm">Подтверждение пароля</label>
            <input type="password" id="reg-password-confirm" v-model="registerForm.passwordConfirm" placeholder="••••••••" required>
          </div>
          <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
          <p class="auth-form__hint">Уже есть аккаунт? <a href="#" @click.prevent="activeTab = 'login'" class="auth-form__switch">Войдите</a></p>
        </form>
      </div>
    </div>
  </main>
</template>

<script setup>
import { ref } from 'vue'

const activeTab = ref('login')

const loginForm = ref({
  email: '',
  password: ''
})

const registerForm = ref({
  name: '',
  email: '',
  password: '',
  passwordConfirm: ''
})

function onLogin() {
  alert('Вход выполнен (заглушка). Email: ' + loginForm.value.email)
}

function onRegister() {
  alert('Регистрация (заглушка). Имя: ' + registerForm.value.name)
}
</script>