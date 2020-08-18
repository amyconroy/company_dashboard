<template>
  <div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>File Name</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="file in files" :key="file.id">
                    <td>{{ file.fileName }}</td>
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
  }
</script>