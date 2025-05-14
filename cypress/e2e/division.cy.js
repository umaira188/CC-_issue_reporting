describe('Division Office Admin Dashboard', () => {
    beforeEach(() => {
      // Log in as Division Office admin
      cy.visit('/login');
      cy.get('input[name=email]').type('division@gmail.com'); // Replace with actual email
      cy.get('input[name=password]').type('123456789'); // Replace with actual password
      cy.get('button[type=submit]').click();
  
      // Confirm redirected to dashboard
      cy.url().should('include', '/admin/division'); // Adjust route if needed
    });
  
    it('Displays complaints and updates a complaint status', () => {
      // Visit the dashboard explicitly
      cy.visit('/admin/division'); // Adjust route if needed
  
      // Confirm the header
      cy.contains('Division Office Dashboard');
  
      // Check if at least one complaint is shown
      cy.get('strong').first().should('exist');
  
      // Optional: Test View Details link
      cy.get('a')
        .contains('View Details')
        .first()
        .should('have.attr', 'href')
        .then((href) => {
          cy.visit(href);
          cy.go('back');
        });
  
      // Submit a status update
      cy.get('form').first().within(() => {
        cy.get('select[name=status]').select('Completed');
        cy.get('button[type=submit]').click();
      });
  
      // Confirm the updated status text appears
      cy.contains('Completed').should('exist');
    });
  });
  