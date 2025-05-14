describe('Track Complaint Page - Authenticated Access', () => {
    beforeEach(() => {
      // Login
      cy.visit('/login');
      cy.get('input[name=email]').type('user@example.com');
      cy.get('input[name=password]').type('password');
      cy.get('button[type=submit]').click();
  
      // Confirm login
      cy.url().should('include', '/lodge-complaint');
    });
  
 
    it('Track the complaints with the issue ID', () => {
      cy.visit('/track-complaint');
  
      // Enter an invalid ID
      cy.get('input[name="issue_id"]').type('GRB-LBV1-023413');
  
      // Submit
      cy.get('#track-form').submit();
  
      // Check error message
     
    });
  });
  