import http from 'k6/http';
import { check, sleep } from 'k6';

export let options = {
  vus: 10,
  duration: '5s',
};

export default function () {
  const url = 'http://127.0.0.1:8000/api/transactions-test';

  const payload = JSON.stringify({
    id_barang: 1,          
    tipe_transaksi: 'masuk',
    jumlah: 1,
  });

  const params = {
    headers: {
      'Content-Type': 'application/json',
      'Accept': 'application/json',
    },
  };

  let res = http.post(url, payload, params);

  check(res, { 'status 200': (r) => r.status === 200 });

  sleep(1);
}
