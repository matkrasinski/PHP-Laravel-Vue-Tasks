<template>
 <table class="table align-middle">
        <tr>
            <th>First name</th>
            <td>{{ customer.first_name }}</td>
        </tr>
        <tr>
            <th>Last name</th>
            <td>{{ customer.last_name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ customer.email }}</td>
        </tr>
        <tr>
            <th>Phone number</th>
            <td>{{ customer.phone_number }}</td>
        </tr>

    </table>
</template>

<script>
import axios from 'axios'

export default {
  name: 'CustomersDetailsComponent',
  props: ['customerId'],
  data() {
    return {
        customer: {}
    }
  },
  mounted() {
    axios.get(`${this.API_URL}/customers/${this.customerId}`).then(res => {
        this.customer = res.data
    
    }).catch(error => {
        console.log(error.message)
    })
  }
}
</script>