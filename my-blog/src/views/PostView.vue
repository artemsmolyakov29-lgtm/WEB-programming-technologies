<template>
  <main class="main">
    <div class="container">
      <article v-if="post" class="post-full">
        <h1 class="post-full__title">{{ post.title }}</h1>
        <div class="post-full__meta">
          <span class="post-full__date">{{ post.date }}</span>
          <span class="post-full__category">{{ post.category }}</span>
          <span class="post-full__author">{{ post.author }}</span>
        </div>
        <img :src="post.image" :alt="post.title" class="post-full__image">
        <div class="post-full__content" v-html="post.content"></div>

        <section class="comments">
          <h3>Комментарии ({{ post.comments.length }})</h3>
          <div v-for="(comment, index) in post.comments" :key="index" class="comment">
            <div class="comment__header">
              <span class="comment__author">{{ comment.author }}</span>
              <span class="comment__date">{{ comment.date }}</span>
            </div>
            <p class="comment__text">{{ comment.text }}</p>
          </div>
          <p v-if="post.comments.length === 0">Пока нет комментариев.</p>
        </section>
      </article>
      <p v-else>Новость не найдена.</p>
    </div>
  </main>
</template>

<script setup>
import { useRoute } from 'vue-router'
import { computed } from 'vue'
import { posts } from '@/data/posts'

const route = useRoute()
const post = computed(() => {
  const id = Number(route.params.id)
  return posts.find(p => p.id === id)
})
</script>