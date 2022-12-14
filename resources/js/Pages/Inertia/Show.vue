<script setup>
import { Inertia } from '@inertiajs/inertia'

defineProps({ // Laravelからの変数の受け取り
 id : String,
 blog: Object
})

//関数を変数に代入することが可能。idは関数の引数に当たる
//const 変数名 = 関数 => {処理内容}
//関数は引数が1つ
//ある場合()を省略して記載が可能。引数がない場合()をつける
const deleteConfirm = id => {
    //console.log(id)
    //${id}と記載することでidを渡すことができる
    Inertia.delete(`/inertia/${id}`, {
        onBefore: () => confirm('本当に削除しますか？')
    })

}

</script> 

<template>
 {{ id }} // propsで渡ってきた変数<br>
 {{ blog.title }}
 <button @click="deleteConfirm(blog.id)">削除</button>
</template> 
