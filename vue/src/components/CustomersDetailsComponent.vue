<template>
    <h2>Customer data</h2>
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

    <h2>Last orders</h2>
    <table class="container">
        <table class="table align-middle">
        <tr>
            <th>Order ID</th>
            <th>Order date</th>
            <th>Order status</th>
            <th>Shipping address</th>
            <th>Total amount</th>
            <th>Notes</th>
            
        </tr>
        <tr v-for="order in this.lastOrders" :key="order">
            <td>{{ order.id }}</td>
            <td>{{ order.order_date }}</td>
            <td>{{ order.order_status }}</td>
            <td>{{ order.shipping_address }}</td>
            <td>{{ order.total_amount }}</td>
            <td>{{ order.notes }}</td>
        </tr>
    </table>

    </table>
    <h2>Employee</h2>
    <table class="table align-middle">
        <tr>
            <th>First name</th>
            <td>{{ employee.first_name }}</td>
        </tr>
        <tr>
            <th>Last name</th>
            <td>{{ employee.last_name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ employee.email }}</td>
        </tr>
        <tr>
            <th>Phone number</th>
            <td>{{ employee.phone_number }}</td>
        </tr>
        <tr>
            <th>Hire date</th>
            <td>{{ employee.hire_date }}</td>
        </tr>
        <tr>
            <th>Job title</th>
            <td>{{ employee.job_title }}</td>
        </tr>
        <tr>
            <th>Salary</th>
            <td>{{ employee.salary }}</td>
        </tr>
    </table>
</template>

<script>

export default {
  name: 'CustomersDetailsComponent',
  props: ['customerId'],
  data() {
    return {
        customer: {},
        employee: {},
        lastOrders: []
    }
  },
  mounted() {
    this.$http.get(`${this.API_URL}/customers/${this.customerId}`).then(res => {
        this.customer = res.data
        this.employee = this.customer.employee;
        this.lastOrders = this.customer.orders
    }).catch(error => {
        console.log(error.message)
    })
  }
}
</script>