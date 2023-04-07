<template>
        <div class="page_notfound">
            در این مکان محتوایی وحود ندارد
        </div>
    <router-link :to="{  name : 'landing_page' }">صفحه نخست</router-link>
</template>

<script>
export default {
    name: "404"
}
</script>

<style scoped>
.page_notfound
    {
    width: 100%;
    height: 100%;
    padding : 0 ;
    margin: 0;
    align-items: center;
    align-content: center;
    justify-content: center;
}

</style>
