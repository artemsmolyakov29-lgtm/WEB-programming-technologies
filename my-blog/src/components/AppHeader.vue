<template>
  <header class="header">
    <div class="container">
      <div class="header__inner">
        <router-link to="/" class="logo">MyBlog</router-link>
        <nav class="nav">
          <router-link to="/" class="nav__link" active-class="active">Главная</router-link>
          <a href="#" class="nav__link">Категории</a>
          <router-link to="/auth" class="nav__link" active-class="active">Войти</router-link>
        </nav>
      </div>
    </div>
  </header>
</template>

<script setup>
// Компонент не требует логики
</script>