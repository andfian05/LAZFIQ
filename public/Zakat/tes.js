// Deklarasikan string yang diberikan
const str = "ABDCKDHJABDCBDAUOQJDBADCLDLCHBCBABCBAABCDAJDBABDCABDABDBCADBCASSJGABCDAUTACBDBQWUDNCDBCADKDHABDJGBDABCBDBADCACADBADBCBAD";

// Deklarasikan pola yang dicari
const pattern = "ABCD";

// Fungsi untuk menghitung kemunculan pola dalam string
function countPatternOccurrences(str, pattern) {
    let count = 0;
    let pos = str.indexOf(pattern);

    // Ulangi pencarian sampai tidak ada kemunculan lagi
    while (pos !== -1) {
        count++;
        // Cari kemunculan berikutnya setelah posisi yang ditemukan +1
        pos = str.indexOf(pattern, pos + 1);
    }

    return count;
}

// Hitung jumlah pola dalam string
const occurrences = countPatternOccurrences(str, pattern);

// Cetak hasilnya
console.log("Jumlah kemunculan pola '" + pattern + "' dalam string adalah: " + occurrences);
