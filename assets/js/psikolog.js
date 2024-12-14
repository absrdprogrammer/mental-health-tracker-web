const psychologists = [
    {
      name: "Dr. Dianne Rachel",
      title: "Experienced Psychologist",
      image: "img/download (3).jpeg",
    },
    {
      name: "Dr. John Smith",
      title: "Clinical Psychologist",
      image: "img/download (4).jpeg",
    },
    {
      name: "Dr. Susan Lee",
      title: "Child Psychologist",
      image: "img/download (5).jpeg",
    },
  ];
  
  let currentIndex = 0;
  
  // Fungsi untuk memperbarui tampilan psikolog
  function updatePsychologist(index) {
    const psychologist = psychologists[index];
    document.getElementById("psychologistImage").src = psychologist.image;
    document.getElementById("psychologistName").textContent = psychologist.name;
    document.getElementById("psychologistTitle").textContent = psychologist.title;
  }
  
  function prevPsychologist() {
    currentIndex = currentIndex === 0 ? psychologists.length - 1 : currentIndex - 1;
    updatePsychologist(currentIndex);
  }
  
  function nextPsychologist() {
    currentIndex = currentIndex === psychologists.length - 1 ? 0 : currentIndex + 1;
    updatePsychologist(currentIndex);
  }
  