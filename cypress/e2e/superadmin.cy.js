describe('Super Admin Panel', () => {
    beforeEach(() => {
      // Log in as Super Admin before each test
      cy.visit('/login');
      cy.get('input[name=email]').type('superadmin@gmail.com'); // Replace with actual super admin email
      cy.get('input[name=password]').type('987654321'); // Replace with actual password
      cy.get('button[type=submit]').click();
      
  
      // Assert redirection to super admin dashboard
      cy.url().should('include', '/admin/manage');
    });
  
    it('creates a new department admin', () => {
      cy.visit('/admin/manage');
  
      // Fill in the new admin form
      cy.get('input[name=name]').type('Test Admin');
      cy.get('input[name=email]').type('testadmin@example.com');
      cy.get('select[name=role]').select('municipal');
      cy.get('input[name=password]').type('securepassword');
  
      // Submit form
      cy.get('form').contains('Create Admin').click();
  
      // Assert success message
      cy.contains('success', { matchCase: false }).should('exist');
      cy.contains('Test Admin').should('exist');
    });
  
    it('edits an existing admin', () => {
      cy.visit('/superadmin');
  
      // Click edit for the first admin (assumes admin exists)
      cy.get('a').contains('Edit').first().click();
  
      // We're on the edit page now
      cy.url().should('include', '/admin/edit');
  
      // Update the name
      cy.get('input[name=name]').clear().type('Updated Name');
      cy.get('button[type=submit]').click();
  
      // Back to list with confirmation
      cy.contains('success').should('exist');
      cy.contains('Updated Name').should('exist');
    });
  
    it('deletes an existing admin', () => {
      cy.visit('/superadmin');
  
      // Click the delete button (assumes admin exists)
      cy.get('form button').contains('Delete').first().click();
  
      // Cypress automatically handles confirm dialogs by default
      // You can explicitly stub it if needed
      // cy.on('window:confirm', () => true);
  
      // Success message and admin no longer in the list
      cy.contains('success').should('exist');
    });
  });
  