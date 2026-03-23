document.addEventListener("DOMContentLoaded", function () {
  const contactform = document.querySelector("form");
  const form = document.getElementById("formkomentar");
  const namaInput = document.getElementById("nama");
  const komentarInput = document.getElementById("komentar");
  const daftarKomentar = document.getElementById("daftarkomentar");

  if (!form) return;

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    // logika captha
    const response = grecaptcha.getResponse();

    if (response.lengt === 0) {
      alert("silahkan centang reCaptcha terlebih dahulu");
    }

    const nama = namaInput.value.trim();
    const komentar = komentarInput.value.trim();

    if (nama && komentar) {
      const card = document.createElement("div");
      card.classList.add("testimonial-card", "mb-3");

      const initialCircle = document.createElement("div");
      initialCircle.classList.add("initial-circle");
      initialCircle.textContent = nama.charAt(0).toUpperCase();

      const text = document.createElement("p");
      //gunakan textcontent untuk keamanan (mencegas serangan xss)
      const strong = document.createElement("strong");
      strong.textContent = "${nama}:";

      // text.innerHTML = `<strong>${nama}:</strong> ${komentar}`;
      text.appendChild(strong);
      text.append(komentar);

      card.appendChild(initialCircle);
      card.appendChild(text);

      daftarKomentar.appendChild(card);

      namaInput.value = "";
      komentarInput.value = "";
      grecaptcha.reset();
    }
  });
});
