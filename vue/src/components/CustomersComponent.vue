<template>

<input class="btn btn-primary col-8" type="button" value="Register new customer" @click="onRegisterNewCustomer"/>
    <table class="container table align-middle">
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
            <input class="btn btn-secondary col-8" type="button" value="Select" @click="onChooseUser(customer.id)"/>
        </tr>
    </table>
</template>
<script>

export default {
    name: 'CustomersComponent.vue',
    data() {
        return {
            customers: [],
            currentUserId: 1
        };
    },
    mounted() {
        this.$http.get(`${this.API_URL}/customers`).then(res => {
            this.customers = res.data;
        }).catch(error => {
            console.log(error.message);
        });
    },
    methods: {
        onChooseUser(id) {
            this.$router.push({ name: 'details', params: {customerId: id} })
        },
        onRegisterNewCustomer() {
            this.$router.push({name: 'register'})
        }
    },  
}

</script>

<style>
    tr:nth-child(even) {background: rgb(241, 241, 241)}
    tr:nth-child(odd) {background: #FFF}
</style>