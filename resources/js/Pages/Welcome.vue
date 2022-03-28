<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";

defineProps({
  canLogin: Boolean,
  canRegister: Boolean,
  laravelVersion: String,
  phpVersion: String,
});
</script>

<template>
  <Head title="Welcome" />

  <div
    class="
      relative
      flex
      items-top
      justify-center
      min-h-screen
      bg-gray-100
      dark:bg-gray-900
      sm:items-center sm:pt-0
    "
  >
    <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
      <Link
        v-if="$page.props.auth.user"
        :href="route('dashboard')"
        class="text-sm text-gray-700 underline"
      >
        Dashboard
      </Link>

      <template v-else>
        <Link :href="route('login')" class="text-sm text-gray-700 underline">
          Log in
        </Link>

        <Link
          v-if="canRegister"
          :href="route('register')"
          class="ml-4 text-sm text-gray-700 underline"
        >
          Register
        </Link>
      </template>
    </div>

    <div class="grid gap-4 mt-6">
      <div class="max-w-screen mx-auto sm:px-6 lg:px-8">
        <button ref="createknights" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" @click.prevent="createKnights()">Start competition</button>

        <table
          class="w-full text-sm text-center text-gray-800 dark:text-gray-400"
          v-if="knights.length > 0"
        >
          <thead
            class="
              text-xs text-gray-900
              uppercase
              bg-gray-50
              dark:bg-gray-700 dark:text-gray-400
            "
          >
            <th scope="col" class="px-6 py-3">Id</th>
            <th scope="col" class="px-6 py-3">Name</th>
            <th scope="col" class="px-6 py-3">Age</th>
            <th scope="col" class="px-6 py-3">Health</th>
            <th scope="col" class="px-6 py-3">Courage</th>
            <th scope="col" class="px-6 py-3">Justice</th>
            <th scope="col" class="px-6 py-3">Mercy</th>
            <th scope="col" class="px-6 py-3">Generosity</th>
            <th scope="col" class="px-6 py-3">Faith</th>
            <th scope="col" class="px-6 py-3">Nobility</th>
            <th scope="col" class="px-6 py-3">Hope</th>
            <th scope="col" class="px-6 py-3">Strength</th>
            <th scope="col" class="px-6 py-3">Defence</th>
            <th scope="col" class="px-6 py-3">Battle</th>
            <th scope="col" class="px-6 py-3">Picture</th>
            <th scope="col" class="px-6 py-3">Virtues</th>
          </thead>
          <tr
            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
            v-for="knight in knights"
            :key="knight.id"
          >
            <td class="px-6 py-4">{{ knight.id }}</td>
            <td class="px-6 py-4">{{ knight.name }}</td>
            <td class="px-6 py-4">{{ knight.age }}</td>
            <td class="px-6 py-4">{{ knight.health }}</td>
            <td class="px-6 py-4">{{ knight.courage }}</td>
            <td class="px-6 py-4">{{ knight.justice }}</td>
            <td class="px-6 py-4">{{ knight.mercy }}</td>
            <td class="px-6 py-4">{{ knight.generosity }}</td>
            <td class="px-6 py-4">{{ knight.faith }}</td>
            <td class="px-6 py-4">{{ knight.nobility }}</td>
            <td class="px-6 py-4">{{ knight.hope }}</td>
            <td class="px-6 py-4">{{ knight.strength }}</td>
            <td class="px-6 py-4">{{ knight.defence }}</td>
            <td class="px-6 py-4">{{ knight.battle }}</td>
            <td class=""><img :src="knight.picture" alt="" /></td>
            <td>{{ knight.virtues }}</td>
          </tr>
        </table>
      </div>

      <div class="max-w-screen mx-auto sm:px-6 lg:px-8">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" @click.prevent="sendLetter()">Send letter</button>

        <table v-if="Object.keys(candidates).length"
          class="w-full text-sm text-center text-gray-800 dark:text-gray-400"
        >
          <thead
            class="
              text-xs text-gray-900
              uppercase
              bg-gray-50
              dark:bg-gray-700 dark:text-gray-400
            "
          >
            <th scope="col" class="px-6 py-3">Id</th>
            <th scope="col" class="px-6 py-3">Name</th>
            <th scope="col" class="px-6 py-3">Age</th>
            <th scope="col" class="px-6 py-3">Health</th>
            <th scope="col" class="px-6 py-3">Courage</th>
            <th scope="col" class="px-6 py-3">Justice</th>
            <th scope="col" class="px-6 py-3">Mercy</th>
            <th scope="col" class="px-6 py-3">Generosity</th>
            <th scope="col" class="px-6 py-3">Faith</th>
            <th scope="col" class="px-6 py-3">Nobility</th>
            <th scope="col" class="px-6 py-3">Hope</th>
            <th scope="col" class="px-6 py-3">Strength</th>
            <th scope="col" class="px-6 py-3">Defence</th>
            <th scope="col" class="px-6 py-3">Battle</th>
            <th scope="col" class="px-6 py-3">Picture</th>
            <th scope="col" class="px-6 py-3">Virtues</th>
          </thead>
          <tr
            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
            v-for="knight in candidates"
            :key="knight.id"
          >
            <td class="px-6 py-4">{{ knight.id }}</td>
            <td class="px-6 py-4">{{ knight.name }}</td>
            <td class="px-6 py-4">{{ knight.age }}</td>
            <td class="px-6 py-4">{{ knight.health }}</td>
            <td class="px-6 py-4">{{ knight.courage }}</td>
            <td class="px-6 py-4">{{ knight.justice }}</td>
            <td class="px-6 py-4">{{ knight.mercy }}</td>
            <td class="px-6 py-4">{{ knight.generosity }}</td>
            <td class="px-6 py-4">{{ knight.faith }}</td>
            <td class="px-6 py-4">{{ knight.nobility }}</td>
            <td class="px-6 py-4">{{ knight.hope }}</td>
            <td class="px-6 py-4">{{ knight.strength }}</td>
            <td class="px-6 py-4">{{ knight.defence }}</td>
            <td class="px-6 py-4">{{ knight.battle }}</td>
            <td class=""><img :src="knight.picture" alt="" /></td>
            <td>{{ knight.virtues }}</td>
          </tr>
        </table>
      </div>

      <div class="max-w-screen mx-auto sm:px-6 lg:px-8">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" @click.prevent="getFinalists()">Get finalists</button>

        <table v-if="Object.keys(finalists).length"
          class="w-full text-sm text-center text-gray-800 dark:text-gray-400"
        >
          <thead
            class="
              text-xs text-gray-900
              uppercase
              bg-gray-50
              dark:bg-gray-700 dark:text-gray-400
            "
          >
            <th scope="col" class="px-6 py-3">Id</th>
            <th scope="col" class="px-6 py-3">Name</th>
            <th scope="col" class="px-6 py-3">Age</th>
            <th scope="col" class="px-6 py-3">Health</th>
            <th scope="col" class="px-6 py-3">Courage</th>
            <th scope="col" class="px-6 py-3">Justice</th>
            <th scope="col" class="px-6 py-3">Mercy</th>
            <th scope="col" class="px-6 py-3">Generosity</th>
            <th scope="col" class="px-6 py-3">Faith</th>
            <th scope="col" class="px-6 py-3">Nobility</th>
            <th scope="col" class="px-6 py-3">Hope</th>
            <th scope="col" class="px-6 py-3">Strength</th>
            <th scope="col" class="px-6 py-3">Defence</th>
            <th scope="col" class="px-6 py-3">Battle</th>
            <th scope="col" class="px-6 py-3">Picture</th>
            <th scope="col" class="px-6 py-3">Virtues</th>
          </thead>
          <tr
            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
            v-for="knight in finalists"
            :key="knight.id"
          >
            <td class="px-6 py-4">{{ knight.id }}</td>
            <td class="px-6 py-4">{{ knight.name }}</td>
            <td class="px-6 py-4">{{ knight.age }}</td>
            <td class="px-6 py-4">{{ knight.health }}</td>
            <td class="px-6 py-4">{{ knight.courage }}</td>
            <td class="px-6 py-4">{{ knight.justice }}</td>
            <td class="px-6 py-4">{{ knight.mercy }}</td>
            <td class="px-6 py-4">{{ knight.generosity }}</td>
            <td class="px-6 py-4">{{ knight.faith }}</td>
            <td class="px-6 py-4">{{ knight.nobility }}</td>
            <td class="px-6 py-4">{{ knight.hope }}</td>
            <td class="px-6 py-4">{{ knight.strength }}</td>
            <td class="px-6 py-4">{{ knight.defence }}</td>
            <td class="px-6 py-4">{{ knight.battle }}</td>
            <td class=""><img :src="knight.picture" alt="" /></td>
            <td>{{ knight.virtues }}</td>
          </tr>
        </table>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" @click.prevent="startBattle">Start battle</button>
        <p ref="results"></p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      knights: [],
      candidates: [],
      finalists: [],
    };
  },

  methods: {
    createKnights() {
      if (confirm("Do you want to create the knights")) {
          this.$refs.createknights.classList.add('animate-spin')
        axios.post("createknights").then((resp) => {
          this.knights = resp.data;
          this.$refs.createknights.classList.remove('animate-spin')
          this.finalists = [];
          this.getCandidates();
          this.$refs.results.innerHTML = ''
        })
      }
    },
    getKnights() {
      axios.get("getknights").then((resp) => {
        this.knights = resp.data;
      });
    },
    getCandidates() {
      axios.get("getcandidates").then((resp) => {
        this.candidates = resp.data;
      });
    },
    sendLetter() {
      if (confirm("Do you want to send a notification to the princess?")) {
        axios.post("sendletter").then((resp) => {
            this.candidates = resp.data
        });
      }
    },
    getFinalists() {
      axios.get("getfinalists").then((resp) => {
        this.finalists = resp.data;
      });
    },
    startBattle() {
      axios.post("startbattle").then((resp) => {
        this.$refs.results.innerHTML = JSON.stringify(resp.data)
      });
    },
  },
  mounted() {
    this.getKnights();
    this.getCandidates();
    this.getFinalists();
  },
};
</script>

<style>
</style>