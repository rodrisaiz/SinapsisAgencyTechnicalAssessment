<template>
    <div class="container mx-auto p-4">
      <div class="flex justify-center mb-4">
        <input v-model="searchQuery" type="text" placeholder="Buscar pokemon" 
               class="border border-gray-300 rounded-l py-2 px-4 w-1/2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        <button @click="searchPokemon"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-r">
          Buscar pokemon
        </button>
      </div>
      <h1 class="text-2xl font-bold mb-4 text-blue-600 text-center">Pokemon Table</h1>
      <table class="min-w-full bg-white border border-gray-300">
        <thead>
          <tr>
            <th class="py-2 px-4 border-b bg-blue-500 text-white text-center">Name</th>
            <th class="py-2 px-4 border-b bg-blue-500 text-white text-center">Abilities</th>
            <th class="py-2 px-4 border-b bg-blue-500 text-white text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(pokemon, index) in pokemonList" :key="pokemon.name" 
              :class="{'bg-gray-100': index % 2 === 0, 'bg-white': index % 2 !== 0}" class="hover:bg-gray-200">
            <td class="py-2 px-4 border-b text-center">{{ pokemon.name }}</td>
            <td class="py-2 px-4 border-b text-center">
              <ul class="list-disc list-inside">
                <li v-for="ability in pokemon.abilities" :key="ability">{{ ability }}</li>
              </ul>
            </td>
            <td class="py-2 px-4 border-b text-center">
              <button @click="goToPokemon(pokemon.name)"
                      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">
                Añadir pokemon a la lista
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue'
  import { router } from '@inertiajs/vue3'
  
  const props = defineProps({
    pokemon: {
      type: Array,
      required: true
    }
  })
  
  const searchQuery = ref('')
  
  const pokemonList = ref(props.pokemon)
  
  const searchPokemon = () => {
    if (searchQuery.value.trim() !== '') {
      router.get(`/pokemon/${searchQuery.value.trim().toLowerCase()}`)
    }
  }
  
  const goToPokemon = (name) => {
    router.get(`/pokemon/${name.toLowerCase()}`)
  }
  </script>
  
  <style scoped>

  </style>
  
  