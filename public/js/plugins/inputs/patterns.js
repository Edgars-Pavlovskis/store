function setupFloatInputValidation(inputId) {
    const inputElement = document.getElementById(inputId);

    if (!inputElement) {
        console.error(`Element with id "${inputId}" not found.`);
        return;
    }
    inputElement.addEventListener('input', function (event) {
        // Replace commas with dots
        this.value = this.value.replace(/,/g, '.');
        // Remove non-numeric and non-dot characters
        this.value = this.value.replace(/[^0-9.]/g, '');
        // Allow only two numbers after the decimal point
        if (this.value.indexOf('.') !== -1) {
            const decimalPart = this.value.split('.')[1];
            if (decimalPart && decimalPart.length > 2) {
            this.value = this.value.slice(0, this.value.lastIndexOf('.') + 3);
            }
        }
        // Allow only one dot
        const dotCount = (this.value.match(/\./g) || []).length;
        if (dotCount > 1) {
            this.value = this.value.slice(0, this.value.lastIndexOf('.'));
        }
    });
}




function setupIntegerInputValidation(inputId) {
    const inputElement = document.getElementById(inputId);

    if (!inputElement) {
      console.error(`Element with id "${inputId}" not found.`);
      return;
    }

    inputElement.addEventListener('input', function (event) {
      // Remove non-numeric characters
      this.value = this.value.replace(/[^0-9]/g, '');
    });
  }
