<template>
  <div>
      <h1>Companies</h1>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Company Name</th>
                <th>Company Description</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="company in companies" :key="company.id">
                    <td>{{ company.companyName }}</td>
                    <td>{{ company.companyDescription }}</td>
                </tr>
            </tbody>
        </table>
  </div>
</template>
<script>
  export default {
      data() {
        return {
          companies: []
        }
      },
      created() {
      let uri = 'http://companydashboard.test/api/companies';
      this.axios.get(uri).then(response => {
        this.companies = response.data.data;
      });
    }
  }
</script>