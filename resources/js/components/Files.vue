<template>
  <div>
      <h1>Files</h1>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>File Number</th>
                <th>File Name</th>
                <th> </th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="file in files" :key="file.id">
                    <td> {{file.id}}</td>
                    <td>{{ file.fileName }}</td>
                    <td><input type = 'button' value='View as PDF'  v-on:click="viewPDF(file.id)"></td>
                </tr>
            </tbody>
        </table>
  </div>
</template>
<script>
  export default {
      data() {
        return {
          files: []
        }
      },
      created() {
        this.axios.get(('/api/files')).then(response => {
          this.files = response.data.data;
        });
    },
     methods: {
        viewPDF(fileId) {
            alert(fileId);
            this.axios.get('/api/pdf').then(response => {
                this.$router.push({name: 'files'});
            });
        }
    }
  }
</script>