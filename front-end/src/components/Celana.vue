<template>
  <div class="hello" style="position:relative; bottom:60px">
    <center>
        <br><hr>
    <h1>Data celana</h1>
    <router-link to="/">
    <button type="button" class="btn btn-sm " style="background:lightgrey; position:relative; bottom:10px; right:300px;">Back</button>
    </router-link>
    <router-link to="/celana/create">
    <button type="button" class="btn btn-sm btn-primary" style="position:relative; bottom:10px; right:298px;">Tambah</button>
    </router-link>
    <table class="table table-hover table-striped" style="width:830px;" ><center>
      <tr>
        <th>No</th>
        <th>Nama Celana</th>
        <th>Ukuran Celana</th>
        <th>Bahan</th>
        <th>Tipe Celana</th>
        <th>Stok</th>
        <th>Aksi</th>
      </tr>
      <tr v-for="(celana, i) in data_celana" :key="i">
          <td>{{ i + 1 }}.</td>
          <td>{{ celana.nama_celana }}</td>
          <td>{{ celana.ukuran_celana }}</td>
          <td>{{ celana.bahan }}</td>
          <td>{{ celana.tipe_celana }}</td>
          <td>{{ celana.stok }}</td>
          <td>
            <router-link :to="'/celana/' + celana.id"><button type="button" class="btn btn-sm btn-primary">Edit</button></router-link>
             | <button @click="deleteRow(celana.id)" class="btn btn-sm btn-danger">Delete</button>
          </td>
        </tr></center>
    </table><br><hr>
    </center>
  </div>
</template>

<script>
import { api } from '@/helper/api'

export default {
  name: 'Celana',
  data () {
    return {
      data_celana: []
    }
  },
  mounted () {
    this.get()
  },
  methods: {
    get () {
      let url = 'http://localhost/studikasusUAS/public/'
      let url2 = 'celana'
      api.get(url + url2).then(res => {
        if (res.data.status === 'success') {
          this.data_celana = res.data.result
        } else {
          console.log(res.data.message)
        }
      }).catch(err => {
        console.log(err)
      })
    },
    deleteRow (id) {
      let url = 'http://localhost/studikasusUAS/public/celana/'
      api.delete(url + id).then(res => {
        if (res.data.status === 'success') {
          this.get()
        } else {
          console.log(res.data.message)
        }
      }).catch(err => {
        console.log(err)
      })
    }
  }
}
</script>
