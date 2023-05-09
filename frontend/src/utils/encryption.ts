const key = 23251233;

export function encryptData(data: string) {
  let encryptedData = "";
  for (let i = 0; i < data.length; i++) {
    let charCode = data.charCodeAt(i);
    if (charCode >= 1040 && charCode <= 1103) {
      // Russian letters
      charCode += key % 32;
      if (charCode > 1103) {
        charCode -= 32;
      }
    } else if (charCode >= 65 && charCode <= 90) {
      // Uppercase English letters
      charCode += key % 26;
      if (charCode > 90) {
        charCode -= 26;
      }
    } else if (charCode >= 97 && charCode <= 122) {
      // Lowercase English letters
      charCode += key % 26;
      if (charCode > 122) {
        charCode -= 26;
      }
    }
    encryptedData += String.fromCharCode(charCode);
  }
  return encryptedData;
}

export function decryptData(data: string) {
  let decryptedData = "";
  for (let i = 0; i < data.length; i++) {
    let charCode = data.charCodeAt(i);
    if (charCode >= 1040 && charCode <= 1103) {
      // Russian letters
      charCode -= key % 32;
      if (charCode < 1040) {
        charCode += 32;
      }
    } else if (charCode >= 65 && charCode <= 90) {
      // Uppercase English letters
      charCode -= key % 26;
      if (charCode < 65) {
        charCode += 26;
      }
    } else if (charCode >= 97 && charCode <= 122) {
      // Lowercase English letters
      charCode -= key % 26;
      if (charCode < 97) {
        charCode += 26;
      }
    }
    decryptedData += String.fromCharCode(charCode);
  }
  return decryptedData;
}
