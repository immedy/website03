$("#Tanggal_Kerusakan").flatpickr({
 
  dateFormat: "Y-m-d H:i",
  minuteIncrement: 1,
  defaultDate: new Date()
});

$("#surat_keluar").flatpickr({
  maxDate: "today"
});

$("#TanggalJadwalDokter").flatpickr({
  altInput: true,
  altFormat: "F j, Y",
  dateFormat: "Y-m-d",
  mode: "range"
});
$("#tanggalDari").flatpickr({
  dateFormat: "Y-m-d",
});

$("#tanggalSampai").flatpickr({
  dateFormat: "Y-m-d",
});

