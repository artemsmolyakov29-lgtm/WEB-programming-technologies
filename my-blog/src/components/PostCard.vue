<template>
  <article class="post-card">
    <img :src="post.image" :alt="post.title" class="post-card__image">
    <div class="post-card__content">
      <h2 class="post-card__title">
        <router-link :to="`/post/${post.id}`">{{ post.title }}</router-link>
      </h2>
      <div class="post-card__meta">
        <span class="post-card__date">{{ post.date }}</span>
        <span class="post-card__category">{{ post.category }}</span>
      </div>
      <p class="post-card__excerpt">{{ post.excerpt }}</p>
      <router-link :to="`/post/${post.id}`" class="post-card__readmore">Читать далее →</router-link>
    </div>
  </article>
</template>

<script setup>
defineProps({
  post: {
    type: Object,
    required: true
  }
})
</script>