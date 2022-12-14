<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import { ref } from 'vue'

const newTitle = ref('')
const newContent = ref('')
</script>

<template>
Inertiaテストです<br>
<a href="/">aタグ経由です</a><br>
<Link href="/">Link経由です</Link><br>
<Link :href="route('inertia.index')">名前付きのルート確認</Link><br>
<Link :href="route('inertia.show', { id : 1 })">ルートパラメーターの確認</Link><br>

<div class="mb-8"></div>
<input type="text" name="newTitle" v-model="newTitle"><br>
<input type="text" name="newContent" v-model="newContent"><br>
<Link as="button" method="post" :href="route('inertia.store')"
 :data="{
    title: newTitle, 
    content: newContent
}">DB保存</Link>

</template>