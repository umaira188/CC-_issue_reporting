describe('Login and Lodge Complaint Page', () => {
    it('logs in and submits a complaint successfully with one click', () => {
      // Step 1: Visit the login page and login
      cy.visit('/login')
  
      // Fill in the login form
      cy.get('input[name=email]').type('user@example.com') // Use a valid test user
      cy.get('input[name=password]').type('password')
  
      // Submit the login form (This is the only click)
      cy.get('button[type=submit]').click()
  
      // Step 2: Ensure redirection to the Lodge Complaint page after login
      cy.url().should('include', '/lodge-complaint') // Adjust this based on where your page redirects after login
  
      // Step 3: Fill the Lodge Complaint form
      // Make sure we target only the complaint form here
      cy.get('form#complaint-form').within(() => {  // Assuming your form has an ID of 'complaint-form'
        // Fill in the complaint form
        cy.get('select[name=issueType]').select('road') // Select "road" for the issue type
        cy.get('input[name=address]').type('123 Main St') // Enter an address
        cy.get('textarea[name=details]').type('There is a pothole near my house.') // Enter complaint details
  
        // Optional: Image upload (use an image stored in 'cypress/fixtures/images/')
        const imagePath = 'images/sample.jpg' // Make sure you have the image in the cypress/fixtures/images/ folder
        cy.get('input[name=image]').selectFile(`cypress/fixtures/${imagePath}`)
      })
  
      // Step 4: Submit the complaint form (This is the only click used here for submission)
      cy.get('form#complaint-form').submit() // This is the single click for submitting the form
  
     
    })
  })
  