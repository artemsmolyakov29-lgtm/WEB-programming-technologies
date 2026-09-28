<template>
  <main class="main">
    <div class="container">
      <section class="posts">
        <h1 class="page-title">Последние новости</h1>
        <div class="posts__grid">
          <PostCard v-for="post in posts" :key="post.id" :post="post" />
        </div>
      </section>
    </div>
  </main>
</template>

<script setup>
import { posts } from '@/data/posts'
import PostCard from '@/components/PostCard.vue'
</script>