<script setup>
//@/をつけるとjsからディレクトリの指定が可能
//親コンポーネントか子コンポーネントで使用する
import GuestLayout from '@/Layouts/GuestLayout.vue'
import Label from '@/Components/InputLabel.vue'
import Text from '@/Components/TextInput.vue'

const emitTest = e => console.log(e)

</script>

<template>
    <GuestLayout>
        何か文字を書く
        <Label value="test Label component">
            タイトル
        </Label>
        <Text 
        modelValue="初期値が入ります"
        @update:modelValue="emitTest"
        ></Text>
    </GuestLayout>
</template>