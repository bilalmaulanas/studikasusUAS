<template>
  <div class="hello" style="position:relative; bottom:60px">
    <br><hr>
    <center><br>
    <router-link to="/baju">
    <button type="button" class="btn btn-md btn-danger" style="position:relative; bottom:10px; right:390px;">Back</button>
    </router-link>
    <h2><b>Tambah/Edit Data Baju</b></h2><br>
    <form @submit.prevent="submitForm">
    <table class="table table-hover table-striped" style="width:830px; border-bottom:1px solid lightgrey;" >
      <tr>
        <td><label>Nama Baju </label></td>
        <td><input type="text" v-model="baju.nama_baju"  class="form-control" required></td>
      </tr>
      <tr>
        <td><label>Ukuran Baju </label></td>
        <td><input type="text"  v-model="baju.ukuran_baju" class="form-control" required></td>
      </tr>
      <tr>
        <td><label>Bahan </label></td>
        <td><input type="text" v-model="baju.bahan" class="form-control" required></td>
      </tr>
      <tr>
        <td><label>Tipe Baju </label></td>
        <td><input type="text" v-model="baju.tipe_baju" class="form-control" required></td>
      </tr>
      <tr>
        <td><label>Stok </label></td>
        <td><input type="number" v-model="baju.stok" class="form-control" required></td>
      </tr>
    </table>
    <button type="submit" class="btn btn-lg btn-success" style="position:relative; left:360px;">Save</button>
    </form>
    </center><hr>
  </div>
</template>
<script>
import {api} from '@/helper/api'

export default {
  name: 'bajuForm',
  data () {
    return {
      baju: {
        id: null,
        nama_baju: '',
        ukuran_baju: '',
        bahan: '',
        tipe_baju: '',
        stok: ''
      }
    }
  },
  mounted () {
    let id = this.$route.params.id

    if (id) {
      let url = 'http://localhost/studikasusUAS/public/baju/'
      api.get(url + id).then(res => {
        this.baju = res.data.result
      })
    }
  },
  methods: {
    submitForm () {
      let data = this.baju
      let url = 'http://localhost/studikasusUAS/public/baju'

      if (this.baju.id) {
        url += '/' + this.baju.id
      }

      api.post(url, data).then(res => {
        if (res.data.status === 'success') {
          this.$router.push('/baju')
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
