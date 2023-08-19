<template>
    <table class="table align-middle">
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Phone number</th>
            <th>Employee Id</th>
            <th>Details</th>
        </tr>
        <tr v-for="customer in this.customers" :key="customer">
            <td>{{ customer.first_name }}</td>
            <td>{{ customer.last_name }}</td>
            <td>{{ customer.email }}</td>
            <td>{{ customer.phone_number }}</td>
            <td>{{ customer.employee_id }}</td>
            <input class="btn btn-primary col-8" type="button" value="Select"/>
        </tr>
    </table>
</template>
<script>
import axios from 'axios'

export default {
  name: 'CustomersComponent.vue',
  data() {
    return {
        customers: []
    }
  },
  mounted() {
    axios.get(`${this.API_URL}/customers`).then(res => {
        this.customers = res.data
    }).catch(error => {
        console.log(error.message)
    })
  }
}

</script>