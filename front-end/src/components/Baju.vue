<template>
  <div class="hello" style="position:relative; bottom:60px">
    <center>
        <br><hr>
    <h1>Data Baju</h1>
    <router-link to="/">
    <button type="button" class="btn btn-sm " style="background:lightgrey; position:relative; bottom:10px; right:328px;">Back</button>
    </router-link>
    <router-link to="/baju/create">
    <button type="button" class="btn btn-sm btn-primary" style="position:relative; bottom:10px; right:325px;">Tambah</button>
    </router-link>
    <table class="table table-hover table-striped" style="width:830px;" ><center>
      <tr>
        <th>No</th>
        <th>Nama Baju</th>
        <th>Ukuran Baju</th>
        <th>Bahan</th>
        <th>Tipe Baju</th>
        <th>Stok</th>
        <th>Aksi</th>
      </tr>
      <tr v-for="(baju, i) in data_baju" :key="i">
          <td>{{ i + 1 }}.</td>
          <td>{{ baju.nama_baju }}</td>
          <td>{{ baju.ukuran_baju }}</td>
          <td>{{ baju.bahan }}</td>
          <td>{{ baju.tipe_baju }}</td>
          <td>{{ baju.stok }}</td>
          <td>
            <router-link :to="'/baju/' + baju.id"><button type="button" class="btn btn-sm btn-primary">Edit</button></router-link>
             | <button @click="deleteRow(baju.id)" class="btn btn-sm btn-danger">Delete</button>
          </td>
        </tr></center>
    </table><br><hr>
    </center>
  </div>
</template>

<script>
import { api } from '@/helper/api'

export default {
  name: 'Baju',
  data () {
    return {
      data_baju: []
    }
  },
  mounted () {
    this.get()
  },
  methods: {
    get () {
      let url = 'http://localhost/studikasusUAS/public/'
      let url2 = 'baju'
      api.get(url + url2).then(res => {
        if (res.data.status === 'success') {
          this.data_baju = res.data.result
        } else {
          console.log(res.data.message)
        }
      }).catch(err => {
        console.log(err)
      })
    },
    deleteRow (id) {
      let url = 'http://localhost/studikasusUAS/public/baju/'
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
