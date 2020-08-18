<template>
    <div>
        <title>Company Dashboard</title>
        <p>                <!-- main html-->
            <router-link :to="{ name: 'home' }">Home</router-link> |
            <router-link :to="{ name: 'companies' }">View All Companies</router-link> |
            <router-link :to="{ name: 'addCompany' }">Add a Company</router-link> |
            <router-link :to="{ name: 'uploadFile' }">Upload a File</router-link> |
            <router-link :to="{ name: 'files' }">View Files</router-link>
        </p>
        <!-- tells which router list from above to display here -->
        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>
<script>
    export default {}
</script>
