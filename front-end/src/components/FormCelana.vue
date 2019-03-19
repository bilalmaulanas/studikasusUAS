<template>
  <div class="hello" style="position:relative; bottom:60px">
    <br><hr>
    <center><br>
    <router-link to="/celana">
    <button type="button" class="btn btn-md btn-danger" style="position:relative; bottom:10px; right:390px;">Back</button>
    </router-link>
    <h2><b>Tambah/Edit Data Celana</b></h2><br>
    <form @submit.prevent="submitForm">
    <table class="table table-hover table-striped" style="width:830px; border-bottom:1px solid lightgrey;" >
      <tr>
        <td><label>Nama Celana </label></td>
        <td><input type="text" v-model="celana.nama_celana"  class="form-control" required></td>
      </tr>
      <tr>
        <td><label>Ukuran Celana </label></td>
        <td><input type="text"  v-model="celana.ukuran_celana" class="form-control" required></td>
      </tr>
      <tr>
        <td><label>Bahan </label></td>
        <td><input type="text" v-model="celana.bahan" class="form-control" required></td>
      </tr>
      <tr>
        <td><label>Tipe Celana </label></td>
        <td><input type="text" v-model="celana.tipe_celana" class="form-control" required></td>
      </tr>
      <tr>
        <td><label>Stok </label></td>
        <td><input type="number" v-model="celana.stok" class="form-control" required></td>
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
  name: 'celanaForm',
  data () {
    return {
      celana: {
        id: null,
        nama_celana: '',
        ukuran_celana: '',
        bahan: '',
        tipe_celana: '',
        stok: ''
      }
    }
  },
  mounted () {
    let id = this.$route.params.id

    if (id) {
      let url = 'http://localhost/studikasusUAS/public/celana/'
      api.get(url + id).then(res => {
        this.celana = res.data.result
      })
    }
  },
  methods: {
    submitForm () {
      let data = this.celana
      let url = 'http://localhost/studikasusUAS/public/celana'

      if (this.celana.id) {
        url += '/' + this.celana.id
      }

      api.post(url, data).then(res => {
        if (res.data.status === 'success') {
          this.$router.push('/celana')
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
