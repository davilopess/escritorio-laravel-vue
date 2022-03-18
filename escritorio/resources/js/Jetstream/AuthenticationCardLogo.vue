<template>
    <Link :href="'/'">
        <img src="/images/HenriqueTeixeira.svg" alt="Logotipo" style="width: 256px">   
    </Link>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Link } from '@inertiajs/inertia-vue3';

    export default defineComponent({
        components: {
            Link,
        },
    })
</script>
