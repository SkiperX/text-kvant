<template>
  <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
           alt="Your Company">
      <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Свяжитесь с нами</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <form class="space-y-6" @submit.prevent="submitForm">
        <Alert
          v-if="result.message"
          :type="result.type"
          :message="result.message"
        ></Alert>
        <div>
          <label class="block text-sm font-medium leading-6 text-gray-900">Имя</label>
          <div class="mt-2">
            <input v-model="formData.name" required
                   class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
        <div>
          <label class="block text-sm font-medium leading-6 text-gray-900">Телефон</label>
          <div class="mt-2">
            <input type="tel" v-model="formData.phone" required
                   class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>
        <div>
          <label class="block text-sm font-medium leading-6 text-gray-900">Сообщение</label>
          <div class="mt-2">
            <textarea v-model="formData.message" required
                      class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 min-h-[80px]"></textarea>
          </div>
        </div>


        <div>
          <button type="submit"
                  class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            Отправить
          </button>
        </div>
      </form>


    </div>
  </div>

</template>

<script>
import Alert from "~/components/Alert.vue"
export default {
  components: {
    Alert,
  },
  data() {
    return {
      formData: {
        name: '',
        phone: '',
        message: ''
      },
      result: {
        type: '',
        message: ''
      }
    };
  },
  methods: {
    async submitForm() {
      try {
        const response = await $fetch('http://localhost:8083/api/feedback', {
          method: 'POST',
          body: JSON.stringify(this.formData),
          headers: {
            'Content-Type': 'application/json'
          }
        });

        this.result.type = 'success'
        this.result.message = response.message
        this.clear()

      } catch (error) {
        this.result.type = 'error'
        this.result.message = error.data.message

      }
    },
    clear() {
      this.formData = {
        name: '',
        phone: '',
        message: ''
      }
    }
  }
}
</script>