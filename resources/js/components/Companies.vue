<template>
  <div>
      <h1>Companies</h1>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Company Name</th>
                <th>Company Description</th>
                <th>Tags</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="company in companies" :key="company.id">
                    <td>{{ company.companyName }}</td>
                    <td>{{ company.companyDescription }}</td>
                    <div v-for="tag in company.tags">
                        <div>{{ tag }}</div>
                    </div>
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
        this.axios.get(('/api/companies')).then(response => {
          this.companies = response.data.data;
        });
    }
  }
</script>